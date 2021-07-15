import axios from 'axios';
import React from 'react';
import ReactDOM from 'react-dom';
import swal from 'sweetalert';
function Delete(props) {
    const destroy = (e) => {
        const afterDeleted = e.currentTarget.parentNode.parentNode.parentNode
        swal("Are you sure ?", {
            buttons: ["No", "Yes"]
        }).then((value) => {
            if (value == true) {
                axios.delete(props.endpoint).then((response) => {
                    afterDeleted.remove();
                })
            }
        });
    }
    return (
        <>
            <button onClick={destroy} className="btn btn-danger btn-sm">Delete</button>
        </>
    );
}

export default Delete;

if (document.querySelectorAll('.delete')) {
    const deleteNodes = document.querySelectorAll('.delete')
    deleteNodes.forEach((item) => {
        ReactDOM.render(<Delete endpoint={item.getAttribute('endpoint')} />, item);
    })
}
