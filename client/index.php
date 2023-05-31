<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script src="https://cdn.jsdelivr.net/npm/web3@1.5.2/dist/web3.min.js"></script>
</head>
<body>
	<img src="logo_telu.png" width="180" height="200">
	<form action="login.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Username</label>
		<input type="text" name="uname" placeholder="Username"><br>

		<label>Password</label>
		<input type="text" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>
	<div class="cont3">
	<a class="cont3" href="verifikasi.php">Verifikasi</a>
	</div> 
	</form>

	<script>
      // Initialize web3
      window.addEventListener("load", async () => {
        if (typeof window.ethereum !== "undefined") {
          // MetaMask is available
          const web3 = new Web3(window.ethereum);
          try {
            // Request access to user's MetaMask accounts
            await window.ethereum.enable();

            // Contract address and ABI
            const contractAddress =
              "0xE0962A267B63d325B8b54FEA580FB009255D60F1";
            const contractABI = [
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "",
                    type: "uint256",
                  },
                ],
                name: "ijazahs",
                outputs: [
                  {
                    internalType: "uint256",
                    name: "id",
                    type: "uint256",
                  },
                  {
                    internalType: "string",
                    name: "nama",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "ipk",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "universitas",
                    type: "string",
                  },
                  {
                    internalType: "bytes32",
                    name: "uniqueHash",
                    type: "bytes32",
                  },
                ],
                stateMutability: "view",
                type: "function",
              },
              {
                inputs: [],
                name: "nextIjazahId",
                outputs: [
                  {
                    internalType: "uint256",
                    name: "",
                    type: "uint256",
                  },
                ],
                stateMutability: "view",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "string",
                    name: "_nama",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "_ipk",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "_universitas",
                    type: "string",
                  },
                ],
                name: "createIjazah",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
              {
                inputs: [],
                name: "getAllIjazahs",
                outputs: [
                  {
                    components: [
                      {
                        internalType: "uint256",
                        name: "id",
                        type: "uint256",
                      },
                      {
                        internalType: "string",
                        name: "nama",
                        type: "string",
                      },
                      {
                        internalType: "string",
                        name: "ipk",
                        type: "string",
                      },
                      {
                        internalType: "string",
                        name: "universitas",
                        type: "string",
                      },
                      {
                        internalType: "bytes32",
                        name: "uniqueHash",
                        type: "bytes32",
                      },
                    ],
                    internalType: "struct StorageIjazah.IjazahData[]",
                    name: "",
                    type: "tuple[]",
                  },
                ],
                stateMutability: "view",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                  {
                    internalType: "bytes32",
                    name: "_uniqueHash",
                    type: "bytes32",
                  },
                ],
                name: "getIjazahByIdAnduniqueHash",
                outputs: [
                  {
                    internalType: "string",
                    name: "",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "",
                    type: "string",
                  },
                ],
                stateMutability: "view",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                  {
                    internalType: "bytes32",
                    name: "_uniqueHash",
                    type: "bytes32",
                  },
                ],
                name: "updateuniqueHash",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                  {
                    internalType: "string",
                    name: "_nama",
                    type: "string",
                  },
                ],
                name: "updateNama",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                  {
                    internalType: "string",
                    name: "_nama",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "_ipk",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "_universitas",
                    type: "string",
                  },
                  {
                    internalType: "bytes32",
                    name: "_uniqueHash",
                    type: "bytes32",
                  },
                ],
                name: "updateData",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                ],
                name: "deleteIjazah",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
            ];

            // Contract instance
            const contract = new web3.eth.Contract(
              contractABI,
              contractAddress
            );

            // Example: Call a contract function
            const result = await contract.methods.getAllIjazahs().call();
            console.log(result);

            // Example: Send a transaction to a contract function
            // const tx = await contract.methods.createIjazah('Name', 'IPK', 'University').send({ from: web3.eth.defaultAccount });
            // console.log(tx);
          } catch (error) {
            console.error(error);
          }
        } else {
          // MetaMask is not available, show an error message or prompt the user to install it
          console.error("Please install MetaMask to use this DApp.");
        }
      });
    </script>

</body>
</html>
