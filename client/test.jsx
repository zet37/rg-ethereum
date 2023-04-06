import React, { useState } from "react";
import Web3 from "web3";
import { abi, contractAddress } from "./Interaction.js"; // import the contract ABI and address
import { createIjazah } from "./StorageIjazah.sol"; // import the contract method that we want to call

const web3 = new Web3("http://localhost:9545"); // create a new Web3 instance connected to the Ethereum network

function IjazahForm() {
  const [nama, setNama] = useState("");
  const [ipk, setIpk] = useState("");
  const [universitas, setUniversitas] = useState("");

  const handleSubmit = async (event) => {
    event.preventDefault();
    try {
      const result = await createIjazah(
        web3,
        abi,
        contractAddress,
        nama,
        ipk,
        universitas
      );
      console.log(result);
      // display success message to the user
    } catch (error) {
      console.error(error);
      // display error message to the user
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Nama:
        <input
          type="text"
          value={nama}
          onChange={(event) => setNama(event.target.value)}
        />
      </label>
      <label>
        IPK:
        <input
          type="text"
          value={ipk}
          onChange={(event) => setIpk(event.target.value)}
        />
      </label>
      <label>
        Universitas:
        <input
          type="text"
          value={universitas}
          onChange={(event) => setUniversitas(event.target.value)}
        />
      </label>
      <button type="submit">Submit</button>
    </form>
  );
}

export default IjazahForm;
