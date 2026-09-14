/**
 * OAuth Callback Handler
 * Handles Google OAuth response inside popup or redirect flow
 */
(function () {
    const { error, homeUrl } = document.body.dataset;

    if (error) {
        if (window.opener) {
            if (window.opener.Toast) {
                window.opener.Toast.show(error, 'error');
            }
            window.close();
        } else {
            window.location.href = (homeUrl || '/') + '?error=' + encodeURIComponent(error);
        }
    } else {
        if (window.opener) {
            // Reload opener window to refresh authentication state
            window.opener.location.reload();
            window.close();
        } else {
            window.location.href = homeUrl || '/';
        }
    }
})();
