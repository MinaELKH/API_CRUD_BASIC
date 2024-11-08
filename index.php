<!DOCTYPE html>
<html>
<head>
    <title>Gestion des étudiants</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <main>
            <h1>Liste des étudiants</h1>
            <ul id="student-list"></ul>

            <h2>Ajouter un étudiant</h2>
            <input type="text" id="name" placeholder="Nom">
            <input type="number" id="age" placeholder="Âge">
            <button id="add-student">Ajouter</button>

            <h2>Modifier un étudiant</h2>
            <input type="number" id="edit-id" placeholder="ID de l'étudiant à modifier">
            <input type="text" id="edit-name" placeholder="Nouveau nom">
            <input type="number" id="edit-age" placeholder="Nouvel âge">
            <button id="edit-student">Modifier</button>

            <h2>Supprimer un étudiant</h2>
            <input type="number" id="delete-id" placeholder="ID de l'étudiant à supprimer">
            <button id="delete-student">Supprimer</button>

    </main>




    <script>
        $(document).ready(function() {
            // Fonction pour charger la liste des étudiants
            function loadStudents() {
                $.get('api/read.php', function(data) {
                    $('#student-list').empty();
                    data.listetudiant.forEach(function(student) {
                        $('#student-list').append('<li>'+ student.id + ' - '  + student.name + ' - ' + student.age + '</li>');
                    });
                });
            }
            // Charger la liste des étudiants au chargement de la page
            loadStudents();

            // Ajouter un étudiant
            $('#add-student').click(function() {
                var name = $('#name').val();
                var age = $('#age').val();
                $.post('api/create.php', { name: name, age: age }, function(data) {
                        loadStudents();
             }) })
    
            // Modifier un étudiant
            $('#edit-student').click(function() {
                var id = $('#edit-id').val();
                var name = $('#edit-name').val();
                var age = $('#edit-age').val();
                $.ajax({
                    url: 'api/update.php?id=' + id,
                    type: 'PUT',
                    data: JSON.stringify({  name: name, age: age }),
                    contentType :'application/json', 
                    success: function() {
                        loadStudents();
                    }
                });
            });

            // Supprimer un étudiant
            $('#delete-student').click(function() {
                var id = $('#delete-id').val();
                $.ajax({
                    url: 'api/delete.php?id='+ id,
                    type: 'DELETE',
                   // data: { id: id }, 
                    success: function() {
                        loadStudents();
                    }
                });
            });
        });
    </script>
</body>
</html>
