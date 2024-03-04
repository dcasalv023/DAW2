import React, { useState } from 'react';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import Container from 'react-bootstrap/Container';
import Swal from 'sweetalert2';
import { Link } from 'react-router-dom';

function Login() {
    const [formData, setFormData] = useState({
    username: '',
    password: '',
    });

    const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({
        ...prevData,
        [name]: value,
    }));
    };

    const handleSubmit = async (e) => {
    e.preventDefault();

    try {
        const response = await fetch('http://localhost:3001/user', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
        });

        if (response.ok) {
        // Lógica para manejar el éxito del inicio de sesión
        console.log('Inicio de sesión exitoso.');
        Swal.fire({
            title: 'Success',
            text: 'Inicio de sesión exitoso.',
            icon: 'success',
            confirmButtonText: 'OK',
        });
        } else {
        // Lógica para manejar el fallo del inicio de sesión
        console.error('Inicio de sesión fallido.');
        Swal.fire({
            title: 'Error',
            text: 'Inicio de sesión fallido. Verifica tus credenciales.',
            icon: 'error',
            confirmButtonText: 'OK',
        });
        }
    } catch (error) {
        console.error('Error de red:', error);
      // Muestra un mensaje de error en caso de fallo de red
        Swal.fire({
        title: 'Error',
        text: 'Error de red. Inténtalo nuevamente.',
        icon: 'error',
        confirmButtonText: 'OK',
        });
    }
    };

    return (
    <Container className="d-flex justify-content-center align-items-center" style={{ minHeight: '80vh' }}>
        <div>
        <h2>Iniciar Sesión</h2>
        <Form onSubmit={handleSubmit}>
            <Form.Group controlId="formUsername">
            <Form.Label>Nombre de usuario</Form.Label>
            <Form.Control
                type="text"
                placeholder="Ingresa tu nombre de usuario"
                name="username"
                value={formData.username}
                onChange={handleChange}
            />
            </Form.Group>

            <Form.Group controlId="formPassword">
            <Form.Label>Contraseña</Form.Label>
            <Form.Control
                type="password"
                placeholder="Ingresa tu contraseña"
                name="password"
                value={formData.password}
                onChange={handleChange}
            />
            </Form.Group>

            <Button variant="primary" type="submit">
            Iniciar Sesión
            </Button>
        </Form>
        <p className="mt-3">
            ¿No tienes una cuenta? <Link to="/register">Regístrate aquí</Link>.
        </p>
        </div>
    </Container>
    );
}

export default Login;