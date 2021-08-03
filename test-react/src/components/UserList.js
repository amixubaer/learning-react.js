import User from "./User";

const UserList = ({ list, callback }) => {
    return (
        <div>
            {list.map((user) => {
                return (
                    <User key={user.id} {...user} deletecallback={callback} />
                );
            })}
        </div>
    );
};

export default UserList;