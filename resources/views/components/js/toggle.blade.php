<script>
    function toggle(y, id) {
        const inputField = document.getElementById(id);
        const isPassword = inputField.type === "password";
        inputField.type = isPassword ? "text" : "password";
        y.classList.toggle('fa-eye');
        y.classList.toggle('fa-eye-slash');
    }
</script>
