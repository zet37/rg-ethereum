// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

contract StorageIjazah {
    struct IjazahData {
        uint256 id;
        string nama;
        string ipk;
        string universitas;
        bytes32 txHash;
    }

    mapping (uint256 => IjazahData) public ijazahs;
    uint256 public nextIjazahId = 0;

    function createIjazah(string memory _nama, string memory _ipk, string memory _universitas) public {
        bytes32 txHash = keccak256(abi.encodePacked(msg.sender, blockhash(block.number - 1)));
        IjazahData memory newIjazah = IjazahData({
            id: nextIjazahId,
            nama: _nama,
            ipk: _ipk,
            universitas: _universitas,
            txHash: txHash
        });
        ijazahs[nextIjazahId] = newIjazah;
        nextIjazahId++;
    }

    function getAllIjazahs() public view returns (IjazahData[] memory) {
        IjazahData[] memory allIjazahs = new IjazahData[](nextIjazahId);
        for (uint256 i = 0; i < nextIjazahId; i++) {
            allIjazahs[i] = ijazahs[i];
        }
        return allIjazahs;
    }

    function getIjazahByIdAndTxHash(uint256 _id, bytes32 _txHash) public view returns (string memory, string memory, string memory) {
        require(_id < nextIjazahId, "Invalid Ijazah ID");
        require(ijazahs[_id].txHash == _txHash, "Transaction hash does not match");
        return (ijazahs[_id].nama, ijazahs[_id].ipk, ijazahs[_id].universitas);
    }

    function updateTxHash(uint256 _id, bytes32 _txHash) public {
        require(_id < nextIjazahId, "Invalid Ijazah ID");
        ijazahs[_id].txHash = _txHash;
    }

    function updateNama(uint256 _id, string memory _nama) public {
        require(_id < nextIjazahId, "Invalid Ijazah ID");
        ijazahs[_id].nama = _nama;
    }
    function updateData(uint256 _id, string memory _nama, string memory _ipk, string memory _universitas, bytes32 _txHash) public {
        require(_id < nextIjazahId, "Invalid Ijazah ID");
        ijazahs[_id].nama = _nama;
        ijazahs[_id].ipk = _ipk;
        ijazahs[_id].universitas = _universitas;
        ijazahs[_id].txHash = _txHash;
    }
}