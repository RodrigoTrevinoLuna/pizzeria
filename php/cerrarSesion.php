<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
<script>
window.location="../index.html";
</script>
<?php
?>