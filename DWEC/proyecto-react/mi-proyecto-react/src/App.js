// App.js
import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Inicio from './components/Inicio';
import Register from './components/Register';
import AcercaDe from './components/AcercaDe';
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
          <Route path="/Register" element={<Register/>} />
          <Route path="/Error" element={<Error/>} />
          <Route path="/Calculadora" element={<Calculadora/>} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
