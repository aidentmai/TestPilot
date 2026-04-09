import axios from "axios";

const API_BASE_URL = "/api";

const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    "Content-Type": "application/json",
  },
});

export const apiService = {
  // Test endpoints
  getHello() {
    return api.get("/hello");
  },

  getStatus() {
    return api.get("/status");
  },

  getItems() {
    return api.get("/items");
  },
};

export default api;
