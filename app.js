const express = require("express");
const cors = require("cors");
const criteriaRoutes = require("./routes/criteriaRoutes");

const app = express();
const PORT = 3000;

// Middleware
app.use(cors());
app.use(express.json());

// Routes
app.use("/api/criteria", criteriaRoutes);

// Start the server
app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});