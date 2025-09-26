import cv2

# Baca citra
citra = cv2.imread('bojak.jpeg')

# Konversi ke grayscale dulu
gray = cv2.cvtColor(citra, cv2.COLOR_BGR2GRAY)

# Terapkan thresholding (nilai ambang = 128)
_, thresh = cv2.threshold(gray, 128, 255, cv2.THRESH_BINARY)

# Tampilkan hasil

cv2.imshow('Citra Thresholding', thresh)

cv2.waitKey(0)
cv2.destroyAllWindows()
