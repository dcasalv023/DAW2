import React from "react";
import { Link } from "react-router-dom";
import Platino from "../images/Platino.png";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Button from "react-bootstrap/Button";
import './Inicio.css'; 

const Inicio = () => {
  return (
    <div className="Inicio">
      <Container className="Contenido">
        <h2 className="mb-4">Bienvenido a la Saga de Pokémon!</h2>
        <Row className="justify-content-center align-items-center">
          <Col md={6}>
            <img src={Platino} alt="Platino" className="img-fluid rounded" />
          </Col>
          <Col md={6}>
            <p className="mt-4">
              ¡Te animo a que te adentres en el mundo de los Pokémon, en este caso al juego
              de la cuarta generación Pokémon Platino, donde podrás encontrarte diversas criaturas llamadas Pokémon.
              Te deseo toda la suerte.
            </p>
            <p>
              ¿Listo para la aventura?{" "}
              <Link to="/Register">
                <Button variant="primary">Crea tu cuenta de Pokémon</Button>
              </Link>
              y únete a la diversión.
            </p>
          </Col>
        </Row>
      </Container>
    </div>
  );
};

export default Inicio;
