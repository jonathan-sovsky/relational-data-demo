<?php
include 'db.php';

$pageTitle = "Relational Data Demo";
$bodyClass = "bg-light";
include '../partials/header.php';

// Get filter values
$selectedAuthor = $_GET['author'] ?? '';
$selectedGenre = $_GET['genre'] ?? '';

// Get authors for filter dropdown
$authors = $db->query("SELECT id, name FROM authors ORDER BY name");

// Get genres for filter dropdown
$genres = $db->query("SELECT id, name FROM genres ORDER BY name");

// Build main query
$query = "
    SELECT 
        b.id,
        b.title,
        a.name AS author,
        p.name AS publisher,
        GROUP_CONCAT(g.name SEPARATOR ', ') AS genres
    FROM books b
    JOIN authors a ON b.author_id = a.id
    JOIN publishers p ON b.publisher_id = p.id
    LEFT JOIN book_genres bg ON b.id = bg.book_id
    LEFT JOIN genres g ON bg.genre_id = g.id
";

// Apply filters
$conditions = [];
if ($selectedAuthor) $conditions[] = "b.author_id = " . intval($selectedAuthor);
if ($selectedGenre)  $conditions[] = "bg.genre_id = " . intval($selectedGenre);

if ($conditions) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

$query .= " GROUP BY b.id ORDER BY b.title";

$books = $db->query($query);
?>

<div class="container py-5">
    <h1 class="text-center mb-4">Book Inventory</h1>

    <form method="GET" class="row mb-4">
        <div class="col-md-4">
            <select name="author" class="form-select">
                <option value="">All Authors</option>
                <?php while($a = $authors->fetch_assoc()): ?>
                    <option value="<?= $a['id'] ?>" <?= $selectedAuthor == $a['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($a['name']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-4">
            <select name="genre" class="form-select">
                <option value="">All Genres</option>
                <?php while($g = $genres->fetch_assoc()): ?>
                    <option value="<?= $g['id'] ?>" <?= $selectedGenre == $g['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($g['name']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-primary" type="submit">Filter</button>
            <a href="index.php" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <table class="table table-bordered bg-white shadow-sm">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Genres</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($books->num_rows): ?>
                <?php while($book = $books->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($book['title']) ?></td>
                        <td><?= htmlspecialchars($book['author']) ?></td>
                        <td><?= htmlspecialchars($book['publisher']) ?></td>
                        <td><?= htmlspecialchars($book['genres']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center text-muted">No books found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <div class="container mb-5">
        <h4 class="text-center">Entity Relationship Diagram</h4>
        <div class="ratio ratio-16x9 border rounded shadow-sm">
            <iframe 
                src="https://dbdiagram.io/e/68421df1ba2a4ac57b111fcd/68421df9ba2a4ac57b11215a" 
                title="ERD Diagram"
                style="border: none;">
            </iframe>
        </div>
    </div>

</div>

<?php include '../partials/footer.php'; ?>
