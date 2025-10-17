<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Questions</title>
    <!-- htmx -->
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.7/dist/htmx.min.js"
        integrity="sha384-ZBXiYtYQ6hJ2Y0ZNoYuI+Nq5MqWBr+chMrS/RkXpNzQCApHEhOt2aY8EJgqwHLkJ"
        crossorigin="anonymous"></script>
    <!-- bootstrap 5.3 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-md" id="content">
        <div class="mb-2">
            <a class="pb-2" href="home">Go back to homepage</a>
        </div>

        <div class="sticky-top">
            <form hx-post="crud.php?action=create" hx-target="#question-list" hx-swap="beforeend">
                <div class="input-group pt-3">
                    <input name="question" type="text" class="form-control"
                        placeholder="Please type your Question here ..." required>
                    <button class="btn btn-sm btn-warning">Add Question</button>
                </div>
            </form>
        </div>

        <div class="table-responsive border mt-2">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center text-capitalize" width="5%">id</th>
                        <th class="text-center text-capitalize">question</th>
                        <th class="text-center text-capitalize">answer</th>
                        <th class="text-center" width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody id="question-list" hx-get="crud.php?action=read" hx-trigger="load, every 2s">
                </tbody>
            </table>
        </div>

        <!-- Modal para sa bawat question -->
        <div class="modal fade" id="showEachCard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Question</h1>
                    </div>
                    <!-- mag add ng id kagaya ng "modalBody" para sa handle ng parameter -->
                    <div class="modal-body" id="modalBody">
                        ...
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>