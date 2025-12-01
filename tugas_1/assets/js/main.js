// main.js - interaksi dasar website Jagara Eco Park

document.addEventListener("DOMContentLoaded", function () {
  const navToggle = document.getElementById("navToggle");
  const mainNav = document.getElementById("mainNav");

  // Toggle menu untuk HP/tablet
  if (navToggle && mainNav) {
    navToggle.addEventListener("click", function () {
      mainNav.classList.toggle("active");
    });
  }

  // Smooth scroll dengan offset header untuk SEMUA link internal
  const internalLinks = document.querySelectorAll("a[href^='#']");
  internalLinks.forEach(function (link) {
    link.addEventListener("click", function (e) {
      const href = this.getAttribute("href");

      // Abaikan kalau cuma "#"
      if (!href || href === "#") return;

      const targetId = href.substring(1);
      const targetEl = document.getElementById(targetId);
      if (!targetEl) return;

      e.preventDefault();

      // Kalau link ini di dalam menu HP, tutup menu setelah diklik
      if (mainNav && mainNav.classList.contains("active")) {
        mainNav.classList.remove("active");
      }

      const header = document.querySelector(".site-header");
      const headerHeight = header ? header.offsetHeight : 0;

      const elementTop =
        targetEl.getBoundingClientRect().top + window.pageYOffset;
      const offset = elementTop - headerHeight - 24; // jarak napas 24px

      window.scrollTo({
        top: offset,
        behavior: "smooth",
      });
    });
  });

  // =========================
  // MODAL DETAIL OBYEK WISATA
  // =========================
  const detailButtons = document.querySelectorAll(".btn-obyek-detail");
  const modal = document.getElementById("obyekModal");
  const modalNama = document.getElementById("modalNama");
  const modalHarga = document.getElementById("modalHarga");
  const modalDeskripsi = document.getElementById("modalDeskripsi");
  const modalClose = modal ? modal.querySelector(".obyek-modal-close") : null;

  function openModal(nama, harga, deskripsi) {
    if (!modal) return;
    if (modalNama) modalNama.textContent = nama || "";
    if (modalHarga) modalHarga.textContent = harga || "";
    if (modalDeskripsi) modalDeskripsi.textContent = deskripsi || "";
    modal.classList.add("show");
  }

  function closeModal() {
    if (!modal) return;
    modal.classList.remove("show");
  }

  if (detailButtons.length && modal) {
    detailButtons.forEach(function (btn) {
      btn.addEventListener("click", function () {
        const nama = this.dataset.nama;
        const harga = this.dataset.harga;
        const deskripsi = this.dataset.deskripsi;
        openModal(nama, harga, deskripsi);
      });
    });

    if (modalClose) {
      modalClose.addEventListener("click", closeModal);
    }

    // Klik di luar dialog untuk menutup
    modal.addEventListener("click", function (e) {
      if (e.target === modal) {
        closeModal();
      }
    });

    // ESC untuk tutup
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && modal.classList.contains("show")) {
        closeModal();
      }
    });
  }
});

