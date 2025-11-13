<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Administrativo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInLeft {
      from { opacity: 0; transform: translateX(-30px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @keyframes scaleIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    @keyframes shimmer {
      0% { background-position: -1000px 0; }
      100% { background-position: 1000px 0; }
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .card-animate {
      animation: fadeInUp 0.6s ease forwards;
    }

    .slide-in {
      animation: slideInLeft 0.5s ease forwards;
    }

    .scale-in {
      animation: scaleIn 0.4s ease forwards;
    }

    .hover-lift {
      transition: all 0.3s ease;
    }

    .hover-lift:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .shimmer {
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
      background-size: 1000px 100%;
      animation: shimmer 2s infinite;
    }

    .icon-bounce:hover {
      animation: bounce 0.6s ease;
    }

    .glass-effect {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.95);
    }

    .gradient-text {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .table-row {
      transition: all 0.3s ease;
    }

    .table-row:hover {
      background: linear-gradient(90deg, rgba(59, 130, 246, 0.05), rgba(147, 51, 234, 0.05));
      transform: scale(1.01);
    }

    .btn-action {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .btn-action::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.5);
      transform: translate(-50%, -50%);
      transition: width 0.6s, height 0.6s;
    }

    .btn-action:hover::before {
      width: 300px;
      height: 300px;
    }
  </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 font-sans">

<!-- SIDEBAR MODERNA CON TOGGLE Y ADMINISTRADOR EN LÍNEA -->
<div class="flex">
  <!-- BOTÓN DE TOGGLE -->
  <button id="toggleSidebar" 
    class="fixed top-6 left-6 z-[60] bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-2xl shadow-lg transition-all duration-500">
    <i class="fas fa-bars text-xl"></i>
  </button>

  <!-- SIDEBAR -->
  <aside id="sidebar" 
    class="fixed left-0 top-0 h-full w-72 
      bg-gradient-to-b from-[#0f172a] via-[#1e293b] to-black 
      text-white shadow-2xl z-50 
      rounded-tr-[70px] rounded-br-[70px]
      overflow-hidden backdrop-blur-lg
      transition-all duration-700 ease-out
      translate-x-0">

    <!-- LOGO Y ESTADO ADMIN -->
    <div class="flex flex-col items-center justify-center pt-10 pb-4 relative">
      <img src="assets/img/logo1.png" 
           alt="Logo" 
           class="w-28 h-28 rounded-full shadow-lg hover:scale-110 hover:rotate-6 transition-transform duration-700 ease-out animate-float">
      
      <div class="mt-3 flex items-center gap-2">
        <span class="relative flex h-3 w-3">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
          <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
        </span>
        <p class="text-sm text-gray-300">Administrador en línea</p>
      </div>
    </div>

    <!-- LÍNEA DE DECORACIÓN -->
    <div class="mx-8 mb-6 h-[2px] bg-gradient-to-r from-transparent via-blue-400/40 to-transparent"></div>

    <!-- MENÚ DE NAVEGACIÓN -->
    <nav class="flex flex-col gap-3 px-5">

      <!-- INICIO -->
      <button onclick="showSection('inicio')" 
        class="relative flex items-center gap-4 px-5 py-3 rounded-2xl 
        font-semibold tracking-wide transition-all duration-500
        hover:translate-x-2 overflow-hidden group">

        <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-400 opacity-0 group-hover:opacity-100 blur-xl transition-all duration-700"></span>
        <span class="absolute inset-0 bg-white/5 group-hover:bg-white/10 rounded-2xl transition-all duration-700"></span>

        <i class="fas fa-house relative z-10 text-xl group-hover:text-blue-300 transition-all duration-300"></i>
        <span class="relative z-10">INICIO</span>
      </button>

      <!-- NOTIFICACIONES -->
      <button onclick="showSection('notificaciones')" 
        class="relative flex items-center gap-4 px-5 py-3 rounded-2xl 
        font-semibold tracking-wide transition-all duration-500
        hover:translate-x-2 overflow-hidden group">

        <span class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-500 opacity-0 group-hover:opacity-100 blur-xl transition-all duration-700"></span>
        <span class="absolute inset-0 bg-white/5 group-hover:bg-white/10 rounded-2xl transition-all duration-700"></span>

        <i class="fas fa-bell relative z-10 text-xl group-hover:text-pink-300 transition-all duration-300"></i>
        <span class="relative z-10">NOTIFICACIONES</span>
        <span class="relative z-10 ml-auto bg-red-500 text-xs px-2 py-1 rounded-full shadow-md">3</span>
      </button>





    <!-- ESPACIADOR -->
    <div class="flex-1"></div>

    <!-- BOTÓN SALIR -->
    <div class="p-6">
      <button 
        class="relative w-full flex items-center justify-center gap-3 
        px-4 py-3 font-semibold rounded-2xl 
        bg-gradient-to-r from-red-500 to-red-600 
        hover:from-red-600 hover:to-red-700 
        shadow-lg hover:shadow-[0_0_25px_rgba(239,68,68,0.5)]
        transition-all duration-500 overflow-hidden group">

        <i class="fas fa-sign-out-alt text-xl group-hover:-translate-x-1 transition-transform duration-300"></i>
        <span class="tracking-wide">SALIR</span>

        <span class="absolute top-0 left-0 w-full h-full bg-white/10 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700 ease-out"></span>
      </button>
    </div>
  </aside>
</div>

<!-- ESTILOS Y ANIMACIONES PERSONALIZADAS -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
.animate-float {
  animation: float 4s ease-in-out infinite;
}
</style>

<!-- SCRIPT PARA TOGGLE SIDEBAR -->
<script>
const sidebar = document.getElementById('sidebar');
const toggleBtn = document.getElementById('toggleSidebar');

toggleBtn.addEventListener('click', () => {
  sidebar.classList.toggle('-translate-x-full');
});
</script>


  <!-- Main Content -->
  <main class="ml-64 p-8">
    <!-- Header -->
    <header class="flex justify-between items-center mb-8 slide-in">
      <div>
        <h1 class="text-4xl font-bold gradient-text mb-2">Dashboard Administrativo</h1>
        <p class="text-gray-600">Gestión de usuarios del sistema</p>
      </div>
      <div class="flex items-center gap-4">
        <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-xl shadow-lg">
          <i class="fas fa-user-circle text-3xl text-blue-600"></i>
          <div>
            <p class="font-semibold text-gray-800">Administrador</p>
            <p class="text-xs text-gray-500">admin@sistema.com</p>
          </div>
        </div>
      </div>
    </header>

    <!-- Content Sections -->
    <div id="inicio-section" class="section-content">
      <!-- Module Cards -->
      <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Bienestar Card -->
        <div onclick="showModule('bienestar')" class="card-animate hover-lift bg-gradient-to-br from-lime-400 to-emerald-500 rounded-3xl p-8 text-white shadow-xl cursor-pointer relative overflow-hidden group">
          <div class="absolute inset-0 shimmer opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
              <div>
                <i class="fas fa-heart text-5xl mb-3 icon-bounce"></i>
                <h3 class="text-2xl font-bold">BIENESTAR</h3>
              </div>
            </div>
            <p class="text-lime-100 mb-4">Gestión de bienestar estudiantil</p>
            <div class="flex items-center gap-2 text-sm">
              <i class="fas fa-users"></i>
              <span>2 usuarios registrados</span>
            </div>
          </div>
        </div>

        <!-- Dirección Card -->
        <div onclick="showModule('direccion')" class="card-animate hover-lift bg-gradient-to-br from-sky-400 to-blue-600 rounded-3xl p-8 text-white shadow-xl cursor-pointer relative overflow-hidden group delay-100">
          <div class="absolute inset-0 shimmer opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
              <div>
                <i class="fas fa-building text-5xl mb-3 icon-bounce"></i>
                <h3 class="text-2xl font-bold">DIRECCIÓN</h3>
              </div>
            </div>
            <p class="text-sky-100 mb-4">Gestión de dirección académica</p>
            <div class="flex items-center gap-2 text-sm">
              <i class="fas fa-users"></i>
              <span>2 usuarios registrados</span>
            </div>
          </div>
        </div>

        <!-- Usuarios Card -->
        <div onclick="showModule('usuarios')" class="card-animate hover-lift bg-gradient-to-br from-blue-700 to-indigo-900 rounded-3xl p-8 text-white shadow-xl cursor-pointer relative overflow-hidden group delay-200">
          <div class="absolute inset-0 shimmer opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
              <div>
                <i class="fas fa-users-cog text-5xl mb-3 icon-bounce"></i>
                <h3 class="text-2xl font-bold">USUARIOS</h3>
              </div>
            </div>
            <p class="text-blue-200 mb-4">Gestión general de usuarios</p>
            <div class="flex items-center gap-2 text-sm">
              <i class="fas fa-users"></i>
              <span>2 usuarios registrados</span>
            </div>
          </div>
        </div>
      </section>

      <!-- Welcome Message -->
      <div class="glass-effect rounded-3xl p-12 text-center shadow-xl scale-in">
        <i class="fas fa-rocket text-6xl text-blue-600 mb-4"></i>
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Bienvenido al Sistema</h2>
        <p class="text-gray-600 text-lg">Selecciona un módulo para comenzar a gestionar los usuarios</p>
      </div>
    </div>

    <!-- Notificaciones Section -->
    <div id="notificaciones-section" class="section-content hidden">
      <div class="space-y-4">
        <div class="glass-effect rounded-2xl p-6 shadow-lg hover-lift">
          <div class="flex items-start gap-4">
            <div class="bg-blue-100 p-3 rounded-full">
              <i class="fas fa-user-plus text-blue-600 text-xl"></i>
            </div>
            <div class="flex-1">
              <h3 class="font-bold text-gray-800 mb-1">Nuevo usuario registrado</h3>
              <p class="text-gray-600 text-sm mb-2">Se ha registrado un nuevo usuario en el módulo de Bienestar</p>
              <span class="text-xs text-gray-500">Hace 2 horas</span>
            </div>
          </div>
        </div>

        <div class="glass-effect rounded-2xl p-6 shadow-lg hover-lift">
          <div class="flex items-start gap-4">
            <div class="bg-yellow-100 p-3 rounded-full">
              <i class="fas fa-edit text-yellow-600 text-xl"></i>
            </div>
            <div class="flex-1">
              <h3 class="font-bold text-gray-800 mb-1">Usuario modificado</h3>
              <p class="text-gray-600 text-sm mb-2">Se actualizó la información del usuario admin</p>
              <span class="text-xs text-gray-500">Hace 5 horas</span>
            </div>
          </div>
        </div>

        <div class="glass-effect rounded-2xl p-6 shadow-lg hover-lift">
          <div class="flex items-start gap-4">
            <div class="bg-red-100 p-3 rounded-full">
              <i class="fas fa-trash text-red-600 text-xl"></i>
            </div>
            <div class="flex-1">
              <h3 class="font-bold text-gray-800 mb-1">Usuario eliminado</h3>
              <p class="text-gray-600 text-sm mb-2">Se eliminó un usuario del sistema</p>
              <span class="text-xs text-gray-500">Hace 1 día</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Module Tables -->
    <div id="module-content" class="hidden">
      <div class="glass-effect rounded-3xl p-8 shadow-xl scale-in">
        <!-- Module Header -->
        <div class="flex items-center justify-between mb-8">
          <div class="flex items-center gap-4">
            <button onclick="showSection('inicio')" class="p-3 hover:bg-gray-100 rounded-full transition-all duration-300">
              <i class="fas fa-arrow-left text-2xl text-gray-700"></i>
            </button>
            <div>
              <h2 class="text-3xl font-bold gradient-text" id="module-title">Módulo</h2>
              <p class="text-gray-600" id="module-subtitle">Gestión de usuarios</p>
            </div>
          </div>
          <button onclick="showAddModal()" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-300 shadow-lg flex items-center gap-2 group">
            <i class="fas fa-plus group-hover:rotate-90 transition-transform duration-300"></i>
            <span class="font-semibold">Agregar Usuario</span>
          </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="bg-gradient-to-r from-blue-50 to-purple-50 border-b-2 border-blue-200">
                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                  <i class="fas fa-user mr-2"></i>USUARIO
                </th>
                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                  <i class="fas fa-lock mr-2"></i>PASSWORD
                </th>
                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                  <i class="fas fa-envelope mr-2"></i>CORREO
                </th>
                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                  <i class="fas fa-tag mr-2"></i>ROL
                </th>
                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                  <i class="fas fa-cog mr-2"></i>ACCIONES
                </th>
              </tr>
            </thead>
            <tbody id="table-body" class="divide-y divide-gray-200">
              <!-- Rows will be inserted here -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <!-- Add/Edit Modal -->
  <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-3xl p-8 max-w-md w-full mx-4 shadow-2xl scale-in">
      <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold gradient-text" id="modal-title">Agregar Usuario</h3>
        <button onclick="closeModal()" class="p-2 hover:bg-gray-100 rounded-full transition-all duration-300">
          <i class="fas fa-times text-2xl text-gray-700"></i>
        </button>
      </div>

      <form id="user-form" class="space-y-4">
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="fas fa-user mr-2"></i>Usuario
          </label>
          <input type="text" id="input-usuario" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="fas fa-lock mr-2"></i>Password
          </label>
          <input type="password" id="input-password" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="fas fa-envelope mr-2"></i>Correo
          </label>
          <input type="email" id="input-correo" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="fas fa-tag mr-2"></i>Rol
          </label>
          <input type="text" id="input-rol" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
        </div>

        <div class="flex gap-3 pt-4">
          <button type="button" onclick="closeModal()" class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300 font-semibold">
            Cancelar
          </button>
          <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-300 font-semibold shadow-lg">
            Guardar
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    const moduleData = {
      bienestar: {
        title: 'Bienestar Estudiantil',
        subtitle: 'Gestión de usuarios del departamento de bienestar',
        icon: 'fa-heart',
        users: [
          { usuario: 'admin', password: '********', correo: 'admin@correo.com', rol: 'Administrador' },
          { usuario: 'usuario1', password: '********', correo: 'usuario1@correo.com', rol: 'Bienestar' }
        ]
      },
      direccion: {
        title: 'Dirección Académica',
        subtitle: 'Gestión de usuarios del área de dirección',
        icon: 'fa-building',
        users: [
          { usuario: 'director1', password: '********', correo: 'director1@correo.com', rol: 'Director' },
          { usuario: 'coord1', password: '********', correo: 'coord1@correo.com', rol: 'Coordinador' }
        ]
      },
      usuarios: {
        title: 'Gestión de Usuarios',
        subtitle: 'Administración general de usuarios del sistema',
        icon: 'fa-users-cog',
        users: [
          { usuario: 'user1', password: '********', correo: 'user1@correo.com', rol: 'Usuario' },
          { usuario: 'user2', password: '********', correo: 'user2@correo.com', rol: 'Usuario' }
        ]
      }
    };

    let currentModule = '';
    let editingIndex = -1;

    function showSection(section) {
      document.querySelectorAll('.section-content').forEach(el => el.classList.add('hidden'));
      document.getElementById('module-content').classList.add('hidden');
      
      if (section === 'inicio') {
        document.getElementById('inicio-section').classList.remove('hidden');
      } else if (section === 'notificaciones') {
        document.getElementById('notificaciones-section').classList.remove('hidden');
      }
    }

    function showModule(module) {
      currentModule = module;
      const data = moduleData[module];
      
      document.getElementById('module-title').textContent = data.title;
      document.getElementById('module-subtitle').textContent = data.subtitle;
      
      document.querySelectorAll('.section-content').forEach(el => el.classList.add('hidden'));
      document.getElementById('module-content').classList.remove('hidden');
      
      renderTable();
    }

    function renderTable() {
      const tbody = document.getElementById('table-body');
      const users = moduleData[currentModule].users;
      
      tbody.innerHTML = users.map((user, index) => `
        <tr class="table-row">
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-purple-600 flex items-center justify-center text-white font-bold">
                ${user.usuario.charAt(0).toUpperCase()}
              </div>
              <span class="text-sm font-medium text-gray-900">${user.usuario}</span>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${user.password}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${user.correo}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
              ${user.rol}
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
            <button onclick="editUser(${index})" class="btn-action px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-300 shadow-sm">
              <i class="fas fa-edit mr-1"></i>Editar
            </button>
            <button onclick="deleteUser(${index})" class="btn-action px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-300 shadow-sm">
              <i class="fas fa-trash mr-1"></i>Eliminar
            </button>
            <button onclick="modifyUser(${index})" class="btn-action px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-all duration-300 shadow-sm">
              <i class="fas fa-cog mr-1"></i>Modificar
            </button>
          </td>
        </tr>
      `).join('');
    }

    function showAddModal() {
      editingIndex = -1;
      document.getElementById('modal-title').textContent = 'Agregar Usuario';
      document.getElementById('user-form').reset();
      document.getElementById('modal').classList.remove('hidden');
      document.getElementById('modal').classList.add('flex');
    }

    function editUser(index) {
      editingIndex = index;
      const user = moduleData[currentModule].users[index];
      
      document.getElementById('modal-title').textContent = 'Editar Usuario';
      document.getElementById('input-usuario').value = user.usuario;
      document.getElementById('input-password').value = '';
      document.getElementById('input-correo').value = user.correo;
      document.getElementById('input-rol').value = user.rol;
      
      document.getElementById('modal').classList.remove('hidden');
      document.getElementById('modal').classList.add('flex');
    }

    function modifyUser(index) {
      editUser(index);
    }

    function deleteUser(index) {
      if (confirm('¿Estás seguro de eliminar este usuario?')) {
        moduleData[currentModule].users.splice(index, 1);
        renderTable();
      }
    }

    function closeModal() {
      document.getElementById('modal').classList.add('hidden');
      document.getElementById('modal').classList.remove('flex');
    }

    document.getElementById('user-form').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const newUser = {
        usuario: document.getElementById('input-usuario').value,
        password: '********',
        correo: document.getElementById('input-correo').value,
        rol: document.getElementById('input-rol').value
      };
      
      if (editingIndex >= 0) {
        moduleData[currentModule].users[editingIndex] = newUser;
      } else {
        moduleData[currentModule].users.push(newUser);
      }
      
      renderTable();
      closeModal();
    });

    // Initialize
    showSection('inicio');
  </script>

</body>
</html>