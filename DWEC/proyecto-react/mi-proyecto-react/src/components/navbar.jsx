import React from 'react';
import { Link } from 'react-router-dom';
import './navbar.css'; 

function Navbar() {
  return (
    <div className="navbar">
      <ul>
        <li>
          <Link to="/" className="active">Inicio</Link>
        </li>
        <li>
          <Link to="/acerca-de">Acerca de</Link>
        </li>
        <li>
          <Link to="/register">Alta de Usuario</Link>
        </li>
        <li>
          <Link to="/calculadora">Calculadora</Link>
        </li>
      </ul>
    </div>
  );
}

export default Navbar;
