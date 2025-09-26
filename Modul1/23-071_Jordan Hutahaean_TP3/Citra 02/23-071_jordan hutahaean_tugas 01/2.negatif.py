import cv2

# Baca citra
citra = cv2.imread('bojak.jpeg')

# Konversi ke grayscale
gray = cv2.cvtColor(citra, cv2.COLOR_BGR2GRAY)

# Negatif citra = 255 - pixel
negatif = 255 - gray

# Tampilkan hasil

cv2.imshow('Citra Negatif', negatif)

cv2.waitKey(0)
cv2.destroyAllWindows()
