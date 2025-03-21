<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    <!-- Cabeçalho -->
<header class="bg-blue-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Meu Blog</h1>
      <nav>
        <ul class="flex space-x-4">
          <li><a href="#" class="hover:text-blue-200">Home</a></li>
          <li><a href="#" class="hover:text-blue-200">Sobre</a></li>
          <li><a href="#" class="hover:text-blue-200">Contato</a></li>
          <li><a href="login.php" class="hover:text-blue-200">Entrar</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Destaque -->
  <section class="bg-gray-100 py-12">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-bold text-gray-800">Bem-vindo ao Meu Blog</h2>
      <p class="mt-4 text-gray-600">Aqui você encontra artigos sobre tecnologia, desenvolvimento e muito mais.</p>
      <a href="#" class="mt-6 inline-block px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Posts</a>
    </div>
  </section>
  
  <!-- Grade de Posts -->
  <section class="container mx-auto py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Post 1 -->
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x200" alt="Post 1">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-800">Título do Post 1</h3>
          <p class="mt-2 text-gray-600">Descrição breve do post.</p>
        </div>
      </div>
      <!-- Post 2 e 3 (repetir estrutura) -->
    </div>
  </section>
  
  <!-- Rodapé -->
  <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
      <p>&copy; 2023 Meu Blog. Todos os direitos reservados.</p>
      <div class="mt-4 flex justify-center space-x-4">
        <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
        <a href="#" class="text-gray-400 hover:text-white">LinkedIn</a>
        <a href="#" class="text-gray-400 hover:text-white">GitHub</a>
      </div>
    </div>
  </footer>
</body>
</html>