// Register.jsx
import React, { useState } from 'react';
import './Register.css';

const Register = () => {
  const [usuario, setUsuario] = useState({
    username: '',
    password: ''
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setUsuario(prevUsuario => ({
      ...prevUsuario,
      [name]: value
    }));
  }

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await fetch('http://localhost:3002/users', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(usuario)
      });
  
      if (response.ok) {
        alert('Usuario registrado exitosamente');
        // Redirigir al usuario a la página de inicio de sesión
        // Puedes usar window.location.href o history.push para la redirección
      } else {
        throw new Error('Error al registrar usuario.');
      }
    } catch (error) {
      console.error('Error al registrar usuario:', error.message);
      alert('Error al registrar usuario. Inténtalo nuevamente.');
    }
  };
  
  

  return (
    <div>
      <h1>Registrarse</h1>
      <form onSubmit={handleSubmit}>
        <label>Nombre de usuario</label>
        <input type='text' name='username' value={usuario.username} onChange={handleChange} />
        <label>Contraseña</label>
        <input type='password' name='password' value={usuario.password} onChange={handleChange} />
        <button type='submit'>Registrarse</button>
      </form>
    </div>
  )
}

export default Register;
