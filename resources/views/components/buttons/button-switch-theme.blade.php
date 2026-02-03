<button id="themeToggle" class="btn btn-circle">
    <span id="icon">🌙</span>
</button>
<script>
    const toggle = document.getElementById('themeToggle');
    const icon = document.getElementById('icon');
    const html = document.documentElement;

    function updateIcon(theme) {
        icon.textContent = theme === 'dark' ? '☀️' : '🌙';
    }

    const savedTheme = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-theme', savedTheme);
    updateIcon(savedTheme);

    toggle.addEventListener('click', () => {
        const newTheme = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
        html.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateIcon(newTheme);
    });
</script>
