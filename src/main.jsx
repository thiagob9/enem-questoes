import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './style/main.css'
import Header from './components/Header.jsx'
import Form from './components/Form.jsx'


createRoot(document.getElementById('root')).render(
  <StrictMode>
    <Header></Header>
    <section id="main">
      <Form>
      </Form>
    </section>
  </StrictMode>,
)
