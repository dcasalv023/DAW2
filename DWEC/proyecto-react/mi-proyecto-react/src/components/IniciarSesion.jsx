import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

function InicioSesion() {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  // Efecto para verificar si el usuario ya ha iniciado sesión
  useEffect(() => {
    const usuarioLogueado = sessionStorage.getItem('usuarioLogueado');
    if (usuarioLogueado) {
      navigate('/');
    }
  }, [navigate]);

  const handleLogin = async (event) => {
    event.preventDefault();

    try {
      const response = await fetch('http://localhost:3002/users');
      const data = await response.json();
      
      const usuarioEncontrado = data.find(
        (usuario) => usuario.username === username && usuario.password === password
      );

      if (usuarioEncontrado) {
        alert('¡Inicio de sesión exitoso!');

        sessionStorage.setItem('usuarioLogueado', JSON.stringify(usuarioEncontrado));
        navigate('/');
      } else {
        alert('Credenciales incorrectas');
      }
    } catch (error) {
      console.error('Error:', error);
      alert('Error al intentar iniciar sesión');
    }
  };

  return (
    <div className='ps-5 pt-5'>
      <form onSubmit={handleLogin}>
        <h2>Inicia sesión</h2>
        <div>
          <label>
            Nombre de Usuario:
            <input type="text" value={username} onChange={(e) => setUsername(e.target.value)} />
          </label>
        </div>
        <div>
          <label>
            Contraseña:
            <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} />
          </label>
        </div>
        <button type="submit">Iniciar sesión</button>
      </form>
    </div>
  );
}

export default InicioSesion;
