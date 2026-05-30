document.addEventListener('DOMContentLoaded', function() {
    const backupBtn = document.getElementById('run-manual-backup-btn-1cfaea14');
    const progressContainer = document.getElementById('github-backup-progress-container-1cfaea14');
    const progressBar = document.getElementById('github-backup-progress-bar-1cfaea14');
    const statusText = document.getElementById('github-backup-status-text-1cfaea14');

    // Handle nested checkbox selection
    const fileCheckboxes = document.querySelectorAll('.github-backup-file-checkbox');
    fileCheckboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            const isDir = this.getAttribute('data-isdir') === 'true';
            if (isDir) {
                const nestedUl = this.closest('li').querySelector('ul');
                if (nestedUl) {
                    const nestedCbs = nestedUl.querySelectorAll('.github-backup-file-checkbox');
                    nestedCbs.forEach(nestedCb => nestedCb.checked = this.checked);
                }
            }
        });
    });

    if (backupBtn) {
        backupBtn.addEventListener('click', function() {
            
            // Gather selected paths
            const selected = [];
            const checkboxes = document.querySelectorAll('.github-backup-file-checkbox:checked');
            checkboxes.forEach(cb => {
                selected.push(cb.value);
            });

            if (selected.length === 0) {
                alert('Please select at least one file or folder.');
                return;
            }

            progressContainer.style.display = 'block';
            backupBtn.disabled = true;
            statusText.innerText = 'Scanning selected directories...';
            progressBar.style.width = '5%';

            fetch(githubBackupObj.ajax_url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    action: 'run_github_backup_init_1cfaea14',
                    nonce: githubBackupObj.nonce,
                    selected_paths: JSON.stringify(selected)
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success && data.data.files && data.data.files.length > 0) {
                    const files = data.data.files;
                    const totalFiles = files.length;
                    let currentIndex = 0;

                    const pushNextFile = () => {
                        if (currentIndex >= totalFiles) {
                            pushDatabase();
                            return;
                        }

                        const file = files[currentIndex];
                        statusText.innerText = `Pushing file ${currentIndex + 1} of ${totalFiles}: ${file}`;
                        
                        let pct = 5 + ((currentIndex / totalFiles) * 80);
                        progressBar.style.width = pct + '%';

                        fetch(githubBackupObj.ajax_url, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: new URLSearchParams({
                                action: 'run_github_backup_push_file_1cfaea14',
                                nonce: githubBackupObj.nonce,
                                file_path: file
                            })
                        })
                        .then(r => r.json())
                        .then(d => {
                            currentIndex++;
                            pushNextFile();
                        })
                        .catch(err => {
                            console.error(err);
                            currentIndex++;
                            pushNextFile();
                        });
                    };

                    pushNextFile();
                } else {
                    statusText.innerText = typeof data.data === 'string' ? data.data : 'Error getting files, or no files found in selection.';
                    statusText.style.color = 'red';
                    backupBtn.disabled = false;
                }
            })
            .catch(err => {
                statusText.innerText = 'Network error gathering files.';
                statusText.style.color = 'red';
                backupBtn.disabled = false;
            });
        });

        function pushDatabase() {
            statusText.innerText = 'Pushing database into DATABASE folder...';
            progressBar.style.width = '90%';

            fetch(githubBackupObj.ajax_url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    action: 'run_github_backup_db_1cfaea14',
                    nonce: githubBackupObj.nonce
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    progressBar.style.width = '100%';
                    statusText.innerText = 'Backup completed successfully!';
                    statusText.style.color = 'green';
                } else {
                    statusText.innerText = 'Database push failed, but files completed.';
                }
                backupBtn.disabled = false;
            })
            .catch(err => {
                statusText.innerText = 'Network error while pushing database.';
                statusText.style.color = 'red';
                backupBtn.disabled = false;
            });
        }
    }
});
