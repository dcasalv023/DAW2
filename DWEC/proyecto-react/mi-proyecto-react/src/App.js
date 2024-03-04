// App.js
import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Inicio from './components/Inicio';
import AcercaDe from './components/AcercaDe';
import AltaUsuario from './components/AltaUsuario';
import Error from './components/Error';
import Navbar from './components/navbar';
import Calculadora from './Paginas/calculadora';

function App() {
  return (
    <Router>
      <div className="App">
        <Navbar/>
        <Routes>
          <Route  path="/" element={<Inicio/>} />
          <Route path="/acerca-de" element={<AcercaDe/>} />
          <Route path="/Alta-usuario" element={<AltaUsuario/>} />
          <Route path="/Error" element={<Error/>} />
          <Route path="/Calculadora" element={<Calculadora/>} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
