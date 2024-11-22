<?php
require_once 'db.php'; // Include database connection

// Fetch FAQ categories and their questions
function fetchFaqCategories($pdo) {
    $stmt = $pdo->query("
        SELECT c.id AS category_id, c.title AS category_title, q.question, q.answer 
        FROM faq_categories c 
        LEFT JOIN faq_questions q ON c.id = q.category_id
        ORDER BY c.id, q.id ASC
    ");
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $categories = [];
    foreach ($results as $row) {
        $categoryId = $row['category_id'];
        if (!isset($categories[$categoryId])) {
            $categories[$categoryId] = [
                'title' => $row['category_title'],
                'questions' => [],
            ];
        }
        if (!empty($row['question'])) {
            $categories[$categoryId]['questions'][] = [
                'question' => $row['question'],
                'answer' => $row['answer'],
            ];
        }
    }
    return $categories;
}

$faqCategories = fetchFaqCategories($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ - Sustainable Beauty</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-pink-50">
  <!-- Header -->
  <div class="bg-gradient-to-r from-pink-50 to-white py-16">
    <div class="container mx-auto px-4">
      <h1 class="text-4xl font-bold text-pink-900 text-center mb-6">
        Frequently Asked Questions
      </h1>
      <p class="text-xl text-pink-700 text-center max-w-2xl mx-auto">
        Find answers to common questions about sustainable beauty and how our platform works.
      </p>
    </div>
  </div>

  <!-- Search Bar -->
  <div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg mb-8">
      <div class="p-4">
        <div class="relative">
          <svg class="absolute left-3 top-3 h-5 w-5 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          <input
            type="text"
            placeholder="Search FAQs..."
            class="w-full pl-10 pr-4 py-2 border-2 border-pink-100 rounded-lg focus:outline-none focus:border-pink-500"
          />
        </div>
      </div>
    </div>
  </div>

  <!-- FAQ Categories -->
  <div class="container mx-auto px-4 pb-16">
    <?php foreach ($faqCategories as $category): ?>
      <div class="bg-white mb-8 shadow-lg">
        <div class="p-6">
          <h2 class="text-2xl font-semibold text-pink-900 mb-4">
            <?= htmlspecialchars($category['title']); ?>
          </h2>
          <div class="space-y-2">
            <?php foreach ($category['questions'] as $qa): ?>
              <div class="border-b border-pink-100 last:border-0">
                <button class="w-full py-4 px-2 flex justify-between items-center text-left">
                  <span class="text-lg text-pink-800 hover:text-pink-600">
                    <?= htmlspecialchars($qa['question']); ?>
                  </span>
                  <svg class="w-5 h-5 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9l6 6 6-6"></path>
                  </svg>
                </button>
                <div class="overflow-hidden transition-all duration-300 max-h-96 pb-4 px-2">
                  <p class="text-pink-700">
                    <?= htmlspecialchars($qa['answer']); ?>
                  </p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Contact Section -->
  <div class="container mx-auto px-4 pb-16">
    <div class="bg-gradient-to-r from-pink-50 to-white">
      <div class="p-6 text-center">
        <h2 class="text-2xl font-semibold text-pink-900 mb-4">
          Still Have Questions?
        </h2>
        <p class="text-pink-700 mb-4">
          Can't find what you're looking for? We're here to help!
        </p>
        <button class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 transition-colors duration-300">
          Contact Support
        </button>
      </div>
    </div>
  </div>
</body>
</html>