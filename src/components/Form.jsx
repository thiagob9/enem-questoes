
import { useState, useEffect } from 'react';
import Input from './Input.jsx';
import Button from './Button.jsx';
import { BASE_URL_API, tipos } from '../utils/constants.js';

function Form() {
  const [dataForm, setDataForm] = useState({ materias: [], anos: [], tipo: [] })
  const [options, setOptions] = useState({ subjects: [], years: [] })

  useEffect(() => {
    async function fetchOptions() {
      const promise = await fetch(BASE_URL_API + "infos.php");
      if (promise.status != 200) console.error("Error trying to load options");

      const response = await promise.json();

      setOptions(response.data);
    }

    fetchOptions();
  }, [])

  return (
    <form>
      <h1>Questões Enem(2009-2023)</h1>

      <Input
        name="materias"
        text="Matérias"
        options={options.subjects}
        data={dataForm}
        dataFunction={setDataForm}>
      </Input>
      <Input
        name="anos"
        text="Anos"
        options={options.years}
        data={dataForm}
        dataFunction={setDataForm}>
      </Input>
      <Input name="tipo"
        text="Tipo"
        options={tipos}
        data={dataForm}
        dataFunction={setDataForm}>
      </Input>

      <div className="buttons">
        <Button
          type='submit'
          text="Buscar"
          data={dataForm}
          dataFunction={setDataForm}
        >
        </Button>
        <Button
          type='button'
          text="Resetar filtros"
          data={dataForm}
          dataFunction={setDataForm}>
        </Button>
      </div>
    </form>
  )
}

export default Form
