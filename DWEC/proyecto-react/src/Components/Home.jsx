import React from 'react';
import { Link } from 'react-router-dom';
import PlatinoImage from '../assets/Platino.jpg'; // Cambié el nombre de la importación
import Container from 'react-bootstrap/Container';
import Button from 'react-bootstrap/Button';

function Home() {
    return (
    <Container className="text-center mt-5">
        <h2 className="mb-4">Bienvenido a la Saga Borderlands</h2>
        <img src={PlatinoImage} alt="Pokemon" className="img-fluid rounded" /> {/* Utilizo el nuevo nombre de la variable */}
        <p className="mt-4">
        ¡Explora el emocionante mundo de Borderlands lleno de acción y caos! Descubre personajes únicos,
        obtén armas asombrosas y enfréntate a enemigos desafiantes en este juego de disparos en primera persona.
        </p>
    <p>
        ¿Listo para la aventura?{' '}
        <Link to="/register">
        <Button variant="primary">Crea tu cuenta</Button>
        </Link>
        y únete a la diversión.
    </p>
    </Container>
    );
}

export default Home;
