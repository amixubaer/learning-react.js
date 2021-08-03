import { useEffect } from "react";

export const useFetch = (url, callback) => {
    const getData = async () => {
        const response = await fetch(url + "user");
        const data = await response.json();
        callback(data);
    };

    useEffect(() => {
        getData();
    }, []);
};

export const createUser = (url, data) => {
    fetch(url + "user/create", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Success:", data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};

export const deleteUser = (url, id) => {
    fetch(url + "user/delete/" + id, {
        method: "get",
    })
        .then(() => {
            console.log("removed");
        })
        .catch((err) => {
            console.error(err);
        });
};

export const editUser = (url, data) => {
    fetch(url + "user/edit/" + data.id, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Success:", data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};