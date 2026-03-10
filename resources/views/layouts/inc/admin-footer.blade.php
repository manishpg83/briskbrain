<footer class="admin-footer mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">

            <div class="text-muted small">
                © {{ date('Y') }}
                <strong>
                    {{ config('app.name', 'Your Website') }}
                </strong>
                . All rights reserved.
            </div>

            <div class="footer-links small">
                <a href="#" class="footer-link">Privacy Policy</a>
                <span class="mx-2 text-muted">•</span>
                <a href="#" class="footer-link">Terms & Conditions</a>
            </div>

        </div>
    </div>
</footer>
<style>
    /* Footer */
.admin-footer {
    background: #ffffff;
    padding: 1rem 0;
    border-top: 1px solid #e5e7eb;
}

/* Footer links */
.footer-link {
    color: #64748b;
    text-decoration: none;
    transition: all 0.2s ease;
    font-weight: 500;
}

.footer-link:hover {
    color: #4f46e5;
    text-decoration: underline;
}
</style>