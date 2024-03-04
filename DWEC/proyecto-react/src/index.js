import { useState } from "react";
import "./App.css";
import CustomNavbar from './Components/CustomNavbar';
import "bootstrap/dist/css/bootstrap.min.css";

function App() {
  const [count, setCount] = useState(0);

  return (
    <>
      <CustomNavbar />
    </>
  );
}

export default App;

