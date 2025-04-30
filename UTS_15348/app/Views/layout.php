<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'AuRevoir Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        #sidebar.collapsed {
            margin-left: -250px;
        }
        #content {
            transition: all 0.3s;
            width: 100%;
        }
        #content.expanded {
            margin-left: 0;
        }
    </style>
</head>
<body>

<?= view('components/header') ?>

<div class="d-flex">
    <?= view('components/sidebar') ?>
    <div id="content" class="p-4 flex-grow-1">
        <?= $this->renderSection('content') ?>
    </div>
</div>

<?= view('components/footer') ?>

<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    sidebarToggle.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('expanded');
    });
</script>

</body>
</html>
