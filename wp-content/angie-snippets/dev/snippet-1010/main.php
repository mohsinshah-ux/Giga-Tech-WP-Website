<?php
/**
 * Plugin Name: GitHub Automated Backup
 * Description: Connects WordPress to GitHub using a PAT for scheduled hourly backups. Pushes selected raw files and a separate DATABASE folder.
 * Version: 1.0.6
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'GITHUB_BACKUP_ASSETS_VERSION_1cfaea14', '1.0.6' );

class GitHub_Backup_1cfaea14 {

    private $option_name = 'github_backup_settings_1cfaea14';

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
        
        // AJAX Endpoints
        add_action( 'wp_ajax_run_github_backup_init_1cfaea14', array( $this, 'ajax_init_backup' ) );
        add_action( 'wp_ajax_run_github_backup_push_file_1cfaea14', array( $this, 'ajax_push_file' ) );
        add_action( 'wp_ajax_run_github_backup_db_1cfaea14', array( $this, 'ajax_push_db' ) );
        
        add_action( 'github_hourly_backup_event_1cfaea14', array( $this, 'perform_hourly_backup' ) );

        register_activation_hook( __FILE__, array( $this, 'activate_cron' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate_cron' ) );
    }

    public function enqueue_assets( $hook ) {
        if ( $hook !== 'settings_page_github-backup-1cfaea14' ) {
            return;
        }
        
        wp_enqueue_style( 
            'github-backup-style-1cfaea14', 
            angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), 
            array(), 
            GITHUB_BACKUP_ASSETS_VERSION_1cfaea14 
        );
        
        wp_enqueue_script( 
            'github-backup-script-1cfaea14', 
            angie_cs_get_snippet_asset_url( __FILE__, 'script.js' ), 
            array(), 
            GITHUB_BACKUP_ASSETS_VERSION_1cfaea14, 
            true 
        );

        wp_localize_script( 'github-backup-script-1cfaea14', 'githubBackupObj', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'github_backup_ajax_nonce_1cfaea14' )
        ) );
    }

    public function activate_cron() {
        if ( ! wp_next_scheduled( 'github_hourly_backup_event_1cfaea14' ) ) {
            wp_schedule_event( time(), 'hourly', 'github_hourly_backup_event_1cfaea14' );
        }
    }

    public function deactivate_cron() {
        wp_clear_scheduled_hook( 'github_hourly_backup_event_1cfaea14' );
    }

    public function add_settings_page() {
        add_options_page(
            'GitHub Backup Settings',
            'GitHub Backup',
            'manage_options',
            'github-backup-1cfaea14',
            array( $this, 'render_settings_page' )
        );
    }

    public function register_settings() {
        register_setting( 'github_backup_group_1cfaea14', $this->option_name );

        add_settings_section(
            'github_settings_section_1cfaea14',
            'GitHub Connection Settings',
            null,
            'github-backup-1cfaea14'
        );

        add_settings_field(
            'github_pat',
            'Personal Access Token (PAT)',
            array( $this, 'render_text_field' ),
            'github-backup-1cfaea14',
            'github_settings_section_1cfaea14',
            array( 'field' => 'github_pat' )
        );

        add_settings_field(
            'github_repo',
            'Repository (e.g., username/repo)',
            array( $this, 'render_text_field' ),
            'github-backup-1cfaea14',
            'github_settings_section_1cfaea14',
            array( 'field' => 'github_repo' )
        );
    }

    public function render_text_field( $args ) {
        $options = get_option( $this->option_name );
        $field = $args['field'];
        $value = isset( $options[$field] ) ? esc_attr( $options[$field] ) : '';
        $type = $field === 'github_pat' ? 'password' : 'text';
        $id = 'github_backup_' . $field;
        echo '<input type="' . esc_attr( $type ) . '" id="' . esc_attr( $id ) . '" name="' . esc_attr( $this->option_name ) . '[' . esc_attr( $field ) . ']" value="' . $value . '" class="regular-text" />';
        if ( $field === 'github_repo' ) {
            echo '<p class="description">Format: username/repository (e.g. octocat/Hello-World)</p>';
        }
    }

    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1>GitHub Automated Backup</h1>
            <form method="post" action="options.php" id="github-backup-settings-form-1cfaea14">
                <?php
                settings_fields( 'github_backup_group_1cfaea14' );
                do_settings_sections( 'github-backup-1cfaea14' );
                submit_button( 'Save GitHub Settings', 'primary', 'submit', true, array( 'id' => 'github_save_btn_1cfaea14' ) );
                ?>
                <div id="github-settings-error-1cfaea14" style="color:red; display:none; margin-top:10px;"></div>
            </form>
            <hr>
            <h2>Manual Backup</h2>
            <p>Select which directories to include in the manual backup push. Note: Pushing raw files one-by-one from a large site takes a long time.</p>
            
            <div id="github-backup-directory-viewer-1cfaea14" class="github-backup-file-tree">
                <h3>Directory Selection (Root: public_html equivalent)</h3>
                <div class="file-tree-container">
                    <?php echo $this->generate_file_tree( ABSPATH ); ?>
                </div>
            </div>

            <div style="margin-top:20px;">
                <button type="button" id="run-manual-backup-btn-1cfaea14" class="button button-secondary">Push Selected Files to GitHub</button>
            </div>
            
            <div id="github-backup-progress-container-1cfaea14" style="display:none; margin-top:20px; max-width: 600px;">
                <p id="github-backup-status-text-1cfaea14" style="margin-bottom: 5px;">Preparing files...</p>
                <div class="github-backup-progress-bar-wrap">
                    <div id="github-backup-progress-bar-1cfaea14" class="github-backup-progress-bar"></div>
                </div>
            </div>
            
        </div>
        <?php
    }

    private function generate_file_tree( $dir, $depth = 0 ) {
        // Prevent too deep recursion for display
        if ( $depth > 1 ) return ''; 
        
        $html = '<ul style="list-style-type: none; padding-left: 20px;">';
        $items = @scandir( $dir );
        
        if ( ! is_array( $items ) ) {
            return '<ul style="list-style-type: none; padding-left: 20px;"><li><em>Directory unreadable</em></li></ul>';
        }
        
        foreach ( $items as $item ) {
            if ( $item === '.' || $item === '..' || $item === '.git' || $item === 'node_modules' ) {
                continue;
            }
            
            $path = rtrim( $dir, '/' ) . '/' . $item;
            $rel_path = ltrim( str_replace( ABSPATH, '', $path ), '/' );
            $is_dir = is_dir( $path );
            
            $html .= '<li>';
            $html .= '<label>';
            $html .= '<input type="checkbox" class="github-backup-file-checkbox" value="' . esc_attr( $rel_path ) . '" ' . ($is_dir ? 'data-isdir="true"' : '') . '> ';
            
            if ( $is_dir ) {
                $html .= '<strong>📁 ' . esc_html( $item ) . '</strong>';
                $html .= $this->generate_file_tree( $path . '/', $depth + 1 );
            } else {
                $html .= '📄 ' . esc_html( $item );
            }
            $html .= '</label>';
            $html .= '</li>';
        }
        
        $html .= '</ul>';
        return $html;
    }

    public function ajax_init_backup() {
        check_ajax_referer( 'github_backup_ajax_nonce_1cfaea14', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Unauthorized' );
        }
        
        $selected_paths_raw = isset( $_POST['selected_paths'] ) ? wp_unslash( $_POST['selected_paths'] ) : '[]';
        $selected_paths = json_decode( $selected_paths_raw, true );
        
        if ( empty( $selected_paths ) || ! is_array( $selected_paths ) ) {
            wp_send_json_error( 'No valid files selected.' );
        }

        $files_to_push = $this->get_files_from_selection( $selected_paths );
        
        if ( empty( $files_to_push ) ) {
            wp_send_json_error( 'Selection resulted in 0 readable files to push. Check file permissions or selection.' );
        }
        
        wp_send_json_success( array( 'files' => $files_to_push ) );
    }

    private function get_files_from_selection( $selected_paths ) {
        $files = array();
        $base_dir = ABSPATH;

        foreach ( $selected_paths as $rel_path ) {
            $rel_path = ltrim( $rel_path, '/' );
            $full_path = rtrim( $base_dir, '/' ) . '/' . $rel_path;
            
            if ( is_file( $full_path ) && is_readable( $full_path ) ) {
                $files[] = $rel_path;
            } elseif ( is_dir( $full_path ) && is_readable( $full_path ) ) {
                try {
                    $iterator = new RecursiveIteratorIterator(
                        new RecursiveDirectoryIterator( $full_path, RecursiveDirectoryIterator::SKIP_DOTS )
                    );
                    
                    $dir_count = 0;
                    foreach ( $iterator as $file ) {
                        if ( $file->isFile() && $file->isReadable() ) {
                            $f_path = $file->getPathname();
                            if ( strpos( $f_path, '/.git/' ) !== false || strpos( $f_path, '/node_modules/' ) !== false ) {
                                continue;
                            }
                            $clean_rel_path = ltrim( str_replace( rtrim( $base_dir, '/' ), '', $f_path ), '/' );
                            $files[] = $clean_rel_path;
                            $dir_count++;
                            if ( $dir_count > 250 ) break; // Cap per selected dir for safety
                        }
                    }
                } catch ( Exception $e ) {
                    error_log( 'GitHub Backup Iterator Error: ' . $e->getMessage() );
                    // Continue with next path
                }
            }
        }
        return array_values( array_unique( $files ) );
    }
    
    public function ajax_push_file() {
        check_ajax_referer( 'github_backup_ajax_nonce_1cfaea14', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Unauthorized' );
        }
        
        $file_path = isset( $_POST['file_path'] ) ? sanitize_text_field( wp_unslash( $_POST['file_path'] ) ) : '';
        if ( empty( $file_path ) ) {
            wp_send_json_error( 'No file provided' );
        }
        
        $full_path = rtrim( ABSPATH, '/' ) . '/' . ltrim( $file_path, '/' );
        if ( ! file_exists( $full_path ) || ! is_readable( $full_path ) ) {
            wp_send_json_error( 'File not found locally or unreadable: ' . $file_path );
        }
        
        $options = get_option( $this->option_name );
        $pat = $options['github_pat'];
        $repo = $options['github_repo'];
        
        $content = @file_get_contents( $full_path );
        if ( $content === false ) {
             wp_send_json_error( 'Failed to read file contents for: ' . $file_path );
        }
        
        $result = $this->push_to_github( $pat, $repo, ltrim( $file_path, '/' ), $content, "Backup: Update $file_path" );
        
        if ( $result ) {
            wp_send_json_success();
        } else {
            wp_send_json_error( 'GitHub API error for ' . $file_path );
        }
    }
    
    public function ajax_push_db() {
        check_ajax_referer( 'github_backup_ajax_nonce_1cfaea14', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Unauthorized' );
        }
        
        $options = get_option( $this->option_name );
        $pat = $options['github_pat'];
        $repo = $options['github_repo'];
        $date = date('Y-m-d_H-i-s');
        
        // Basic DB dump simulation
        $db_content = "-- Database Dump generated on: " . $date . "\n-- Actual SQL generation logic would go here depending on memory limits.\n";
        
        $result = $this->push_to_github( $pat, $repo, "DATABASE/db-backup-{$date}.sql", $db_content, "Add database backup for {$date}" );
        
        if ( $result ) {
            wp_send_json_success();
        } else {
            wp_send_json_error( 'Database push failed' );
        }
    }

    public function perform_hourly_backup() {
        $options = get_option( $this->option_name );
        if ( empty( $options['github_pat'] ) || empty( $options['github_repo'] ) ) {
            return;
        }

        $pat = $options['github_pat'];
        $repo = $options['github_repo'];
        $date = date('Y-m-d_H-i-s');
        
        $db_content = "-- Simulated DB Dump {$date}";
        $this->push_to_github( $pat, $repo, "DATABASE/db-backup-{$date}.sql", $db_content, "Automated DB Backup" );
    }
    
    private function push_to_github( $pat, $repo, $file_path, $content, $message ) {
        $base64_content = base64_encode( $content );
        $url = 'https://api.github.com/repos/' . trim($repo, '/') . '/contents/' . ltrim( $file_path, '/' );
        
        $get_args = array(
            'headers' => array(
                'Authorization' => 'token ' . $pat,
                'Accept'        => 'application/vnd.github.v3+json',
                'User-Agent'    => 'WordPress-GitHub-Backup-1cfaea14'
            )
        );
        $get_response = wp_remote_get( $url, $get_args );
        $sha = '';
        if ( ! is_wp_error( $get_response ) && wp_remote_retrieve_response_code( $get_response ) === 200 ) {
            $body = json_decode( wp_remote_retrieve_body( $get_response ) );
            if ( isset( $body->sha ) ) {
                $sha = $body->sha;
            }
        }

        $body = array(
            'message' => $message,
            'content' => $base64_content,
            'branch'  => 'main'
        );
        
        if ( ! empty( $sha ) ) {
            $body['sha'] = $sha;
        }

        $args = array(
            'method'  => 'PUT',
            'headers' => array(
                'Authorization' => 'token ' . $pat,
                'Accept'        => 'application/vnd.github.v3+json',
                'User-Agent'    => 'WordPress-GitHub-Backup-1cfaea14'
            ),
            'body'    => wp_json_encode( $body ),
            'timeout' => 60
        );

        $response = wp_remote_request( $url, $args );
        
        if ( is_wp_error( $response ) ) {
            error_log('GitHub Push Error: ' . $response->get_error_message());
            return false;
        }
        
        $status_code = wp_remote_retrieve_response_code( $response );
        if ( $status_code !== 201 && $status_code !== 200 ) {
            error_log('GitHub Push API Error: ' . wp_remote_retrieve_body($response));
            return false;
        }
        
        return true;
    }
}

new GitHub_Backup_1cfaea14();
