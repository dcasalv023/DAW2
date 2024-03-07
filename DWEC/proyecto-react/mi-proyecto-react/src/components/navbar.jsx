import React from 'react';
import { Link, useNavigate } from 'react-router-dom';
import './navbar.css'; 

const Navbar = () => {
  const navigate = useNavigate();
  const usuarioLogueado = sessionStorage.getItem('usuarioLogueado');

  const handleLogout = () => {
    sessionStorage.removeItem('usuarioLogueado'); 
    navigate('/');
  };

  return (
    <nav className="navbar navbar-expand-lg navbar-info bg-info">
      <div className="container">
        <div className="collapse navbar-collapse" id="navbarSupportedContent">
          <ul className="navbar-nav mr-auto">
            <li className="nav-item">
              <Link to="/" className="nav-link">Inicio</Link>
            </li>
            <li className="nav-item">
              <Link to="/Acerca-de" className="nav-link">Acerca de</Link>
            </li>
            {!usuarioLogueado  ? (
              <>
                <li className="nav-item">
                  <Link to="/Register" className="nav-link">Alta de Usuario</Link>
                </li>
                <li className="nav-item">
                  <Link to="/IniciarSesion" className="nav-link">Login</Link>
                </li>
              </>
            ) : (
              <>
                <li className="nav-item">
                  <Link to="/calculadora" className="nav-link">Calculadora</Link>
                </li>
                <li className="nav-item">
                  <button className="nav-link btn btn-link" onClick={handleLogout}>Cerrar Sesión</button>
                </li>
              </>
            )}
          </ul>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;