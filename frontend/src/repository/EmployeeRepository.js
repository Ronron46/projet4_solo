export async function getEmployees() {
  const url = "http://127.0.0.1:8000/api/getEmployees";
  try {
    const reponse = await fetch(url, {
        method: "GET"
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
    return resultat
    // console.log(resultat);
  } catch (erreur) {
    console.error(erreur.message);
  }
}

export async function getEmployee(id) {
  const url = "http://127.0.0.1:8000/api/employee/" + id;
  try {
    const reponse = await fetch(url, {
        method: "GET"
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
    return resultat
    // console.log(resultat);
  } catch (erreur) {
    console.error(erreur.message);
  }
}

export async function editEmployee(employee) {
  const url = "http://127.0.0.1:8000/api/employee/" + employee.id;
  try {
    const reponse = await fetch(url, {
        method: "PUT",
        body: JSON.stringify(employee)
    });
    if (!reponse.ok) {
      throw new Error(`Statut de réponse : ${reponse.status}`);
    }

    const resultat = await reponse.json();
    // console.log(resultat);
  } catch (erreur) {
    console.error(erreur.message);
  }
}



