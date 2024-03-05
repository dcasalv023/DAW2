import React, {useState} from 'react'

const Register =()=> {
    const [usuario, setUsuario] = useState ({
        nombreUsuario: '',
        contrasena: ''
    });

    const handleChange = (e) => {
        const {name,value} =e.target;
        setUsuario(prevUsuario => ({
            ...prevUsuario,
            [name]:value
        }))
    }

    const handleSubmit = (e) => {
        e.preventDefault()
        fetch('http://localhost:3001/usuarios', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(usuario)
        })

        .then(response => {
            if(response.ok){
                return response.json()
            } else {
                throw new Error ('Registro no exitoso')
            }
        })
        .then(data=> {
            alert('Registrado con exito')
        })
        .catch(error => {
            alert('Error al registrar')
        })
    }

  return (
    <div>
        <form onSubmit={handleSubmit}>
            <h1>Registrarse</h1>
            <label>Nombre de usuario</label>
            <input type='text' name='nombreUsuario' value={usuario.nombreUsuario} onChange={handleChange}></input>
            <label>Contraseña</label>
            <input type='password' name='contrasena' value={usuario.contrasena} onChange={handleChange}></input>

            <button type='submit'>Registrarse</button>
        </form>
    </div>
  )
}

export default Register