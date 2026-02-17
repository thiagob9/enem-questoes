function Input({ name, text, options, data, dataFunction }) {

  function handleChange(event) {
    const selectedValue = event.target.value;
    if (selectedValue == "") return;
    switch (name) {
      case "materias":
        if (data.materias.includes(selectedValue)) return;
        dataFunction(
          {
            ...data,
            materias: [...data.materias, selectedValue]
          })
        break
      case "anos":
        if (data.anos.includes(selectedValue)) return;
        dataFunction(
          {
            ...data,
            anos: [...data.anos, selectedValue]
          })

        break
      case "tipo":
        if (data.tipo.includes(selectedValue)) return;
        dataFunction(
          {
            ...data,
            tipo: [...data.tipo, selectedValue]
          })

        break
      default:
        console.error("Invalid key: ", name)
        break
    }
  }

  function renderSelected(data, type) {
    let selecteds;
    switch (type) {
      case "materias":
        selecteds = data.materias
        break
      case "anos":
        selecteds = data.anos
        break
      case "tipo":
        selecteds = data.tipo
        break
      default:
        console.error("Error trying to render selecteds options");
        break
    }

    return selecteds.map((s) => <p className="selected-option">{s}</p>)
  }

  function renderOptions(options, type) {
    switch (type) {
      case "materias":
        const arr = [];
        for (const [name, text] of Object.entries(options)) {
          arr.push(<option value={name}>{text}</option>);
        }
        return arr;
        break
      case "anos":
        return options.map(option => <option value={option}>{option}</option>);
        break
      case "tipo":
        return options.map(option => <option value={option.name}>{option.text}</option>);
        break
      default:
        console.error("Error trying to render selecteds options");
        break
    }

  }

  return (
    <>
      <div className="input-infos">
        <label htmlFor={name}>{text}</label>
        {renderSelected(data, name)}
      </div>
      <select name={name} onInput={handleChange}>
        <option value="">Selecione</option>
        {renderOptions(options, name)}
      </select>
    </>
  )
}

export default Input
