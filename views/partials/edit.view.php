<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modifier une ressource</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<main>
    <h1>Modifier la ressource</h1>
    <p><a href="index.php">Retour à la liste</a></p>

    <form method="POST" action="edit.php?id=<?= $resource->id ?>">
        <label>
            Titre
            <input type="text" name="title" value="<?= htmlspecialchars($_POST['title'] ?? $resource->title) ?>">
        </label>
        <?php if (isset($errors['title'])): ?><p style="color:red;"><?= $errors['title'] ?></p><?php endif; ?>

        <label>
            Type
            <input type="text" name="type" value="<?= htmlspecialchars($_POST['type'] ?? $resource->type) ?>">
        </label>
        <?php if (isset($errors['type'])): ?><p style="color:red;"><?= $errors['type'] ?></p><?php endif; ?>

        <label>
            Statut
            <select name="status">
                <?php $statuts = ['disponible' => 'Disponible', 'emprunte' => 'Emprunté', 'maintenance' => 'Maintenance']; ?>
                <?php foreach ($statuts as $valeur => $libelle): ?>
                    <option value="<?= $valeur ?>" <?= ($_POST['status'] ?? $resource->status) === $valeur ? 'selected' : '' ?>>
                        <?= $libelle ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <?php if (isset($errors['status'])): ?><p style="color:red;"><?= $errors['status'] ?></p><?php endif; ?>

        <label>
            Emprunteur
            <input type="text" name="borrower" value="<?= htmlspecialchars($_POST['borrower'] ?? $resource->borrower ?? '') ?>">
        </label>

        <button type="submit">Mettre à jour</button>
    </form>
</main>
</body>
</html>
