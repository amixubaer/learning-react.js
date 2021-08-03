import { useState } from "react";
import { useParams, useHistory } from "react-router-dom";

const AddUser = ({ status, callback }) => {
    const { id: eid } = useParams();
    const [name, setName] = useState("");
    const [dept, setDept] = useState("");
    const history = useHistory();

    const onSubmit = (e) => {
        e.preventDefault();
        callback(
            status === "edit"
                ? { id: eid, name: name, dept: dept }
                : { name: name, dept: dept }
        );
        history.push("/userlist");
    };
    return (
        <div>
            <h2>
                This is {status} user page id: {eid}
            </h2>
            <form onSubmit={onSubmit}>
                <label>
                    Name:
                    <input
                        type="text"
                        name="name"
                        value={name}
                        onChange={(e) => setName(e.target.value)}
                    />
                </label>
                <br />
                <label>
                    Department:
                    <input
                        type="text"
                        name="name"
                        value={dept}
                        onChange={(e) => setDept(e.target.value)}
                    />
                </label>
                <br />
                <input type="submit" value="Submit" />
            </form>
        </div>
    );
};

export default AddUser;