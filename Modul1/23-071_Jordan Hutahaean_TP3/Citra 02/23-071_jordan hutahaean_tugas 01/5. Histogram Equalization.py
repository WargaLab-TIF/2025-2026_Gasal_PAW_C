import cv2

# Baca citra
citra = cv2.imread('bojak.jpeg')

# Konversi ke grayscale
gray = cv2.cvtColor(citra, cv2.COLOR_BGR2GRAY)

# Histogram Equalization
eq = cv2.equalizeHist(gray)

# Tampilkan hasil
cv2.imshow('Citra Grayscale', gray)
cv2.imshow('Histogram Equalization', eq)

cv2.waitKey(0)
cv2.destroyAllWindows()
