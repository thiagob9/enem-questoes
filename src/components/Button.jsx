function Button({ text, type, data, dataFunction }) {

  function handleClick(e) {
    // GAMBIARRA
    switch (type) {
      case "submit":
        e.preventDefault()
        console.log("Data submmitted: ", data);
        break
      case "button":
        dataFunction({ materias: [], anos: [], tipo: [] })
        break;
    }
  }

  return (
    <button type={type} onClick={handleClick}>{text}</button>
  )
}

export default Button
