<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
var users = [];
var categories = [];

categories = <?php echo json_encode($all_categories) ?>;
<?php $users = getUsers(); ?>
users = <?php echo json_encode($users) ?>;
</script>

<script src="./js/main.js"></script>


</body>

</html>