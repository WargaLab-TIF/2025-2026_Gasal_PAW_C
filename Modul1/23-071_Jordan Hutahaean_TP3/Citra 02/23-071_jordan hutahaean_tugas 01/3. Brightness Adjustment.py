import cv2

# Baca citra
citra = cv2.imread('bojak.jpeg')

# Tambah brightness dengan konstanta b = 50
bright = cv2.convertScaleAbs(citra, alpha=1, beta=50)

# Kurangi brightness dengan konstanta b = -50
dark = cv2.convertScaleAbs(citra, alpha=1, beta=-50)

# Tampilkan hasil

cv2.imshow('Citra Lebih Terang (+50)', bright)
cv2.imshow('Citra Lebih Gelap (-50)', dark)

cv2.waitKey(0)
cv2.destroyAllWindows()
