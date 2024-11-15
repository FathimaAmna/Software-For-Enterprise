<style>
    /* Import Google font - Poppins */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");


    *,
    *::before,
    *::after {
        box-sizing: border-box;
        user-select: none;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    a {
        text-decoration: none;
    }

    body {
        position: relative;
        height: 100vh;
        width: 100%;
        background-image: url("./assets/imgs/bg4.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        align-items: center;
        justify-content: center;
        background-color: #f0f0f0;
        backdrop-filter: blur(5px);
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: auto;
        background-color: white;
        margin:0 20% 0 20%;
    }

    .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }


    h1 {
        text-align: center;
    }

    /* CSS */
    .btn {
        width: "100px";
        cursor: pointer;
    }

    .button {
        padding: 6px 24px;
        border: 2px solid #fff;
        background: transparent;
        border-radius: 6px;
        cursor: pointer;
    }

    .button:active {
        transform: scale(0.98);
    }

    /* Centering the table */
    .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    /* Table */
    table {
        background-color: lightcoral;
        color: white;
        width: 50%;
        border-radius: 4px;
        border-collapse: collapse;
        box-shadow: 0 2px 8px rgb(103, 49, 71);
        border: 1px solid black;
        /* Adding border */
        margin-top: 10%;
    }

    table thead {
        text-transform: uppercase;
        font-weight: normal;
        font-size: 0.75rem;
    }

    table tr {
        border-bottom: 1px solid var(--border);
    }

    table th,
    table td {
        padding: 10px;
        text-align: center;
        /* Aligning text center */
        box-shadow: 0 1px 4px rgb(103, 49, 71);
        border: 1px solid black;
        /* Adding border */
    }

    table th img,
    table td img {
        display: block;
        margin: 0 auto;
        /* Centering images */
    }

    /* CSS for audio controls */
    .audio-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .audio-controls button {
        background-color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
    }
</style>