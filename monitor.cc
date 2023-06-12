    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .monitor {
            display: flex;
            justify-content: space-between;
            width: 800px;
            height: 400px;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .queue,
        .pending-queue {
            flex: 1;
            padding: 10px;
            overflow-y: scroll;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .queue {
            background-color: #f2f2f2;
        }

        .pending-queue {
            background-color: #f9f9f9;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 8px;
            margin-bottom: 5px;
            background-color: #fff;
            border-radius: 3px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>