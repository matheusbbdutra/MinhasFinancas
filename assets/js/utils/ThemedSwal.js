import Swal from "sweetalert2";

const ThemedSwal = Swal.mixin({
    background: '#2D3748',
    color: '#FFFFFF',
    confirmButtonColor: '#3182CE', 
    iconColor: '#E53E3E' 
});

export default ThemedSwal;
