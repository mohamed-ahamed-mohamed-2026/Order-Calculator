<?php
$items = [
    'لاب توب' => 12000,
    'هاتف ذكي' => 8000,
    'سماعات' => 1500
];
$total = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['quantities'] as $item => $quantity) {
        if (isset($items[$item]) && is_numeric($quantity) && $quantity > 0) {
            $total += $items[$item] * $quantity;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حاسبة الطلبات</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; text-align: center; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        table { width: 100%; margin-bottom: 20px; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        .total { font-size: 1.2rem; color: #28a745; }
        input[type="number"] { width: 60px; }
        button { padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>حاسبة الطلبات</h2>
        <form method="POST">
            <table>
                <tr><th>المنتج</th><th>السعر</th><th>الكمية</th></tr>
                <?php foreach ($items as $item => $price): ?>
                    <tr>
                        <td><?php echo $item; ?></td>
                        <td><?php echo $price; ?> جنيه</td>
                        <td><input type="number" name="quantities[<?php echo $item; ?>]" min="0" value="0"></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button type="submit">احسب الإجمالي</button>
        </form>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $total > 0): ?>
            <p class="total">الإجمالي: <?php echo $total; ?> جنيه</p>
        <?php endif; ?>
    </div>
</body>
</html>