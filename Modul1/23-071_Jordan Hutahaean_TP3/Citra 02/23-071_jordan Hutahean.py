import cv2

# =======================================================
# BAB 2 - Representasi Citra
# =======================================================

# Baca citra
citra = cv2.imread("bojak.jpeg")

# Citra Asli
cv2.namedWindow("Citra Asli (RGB)", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Citra Asli (RGB)", 500, 500)
cv2.imshow("Citra Asli (RGB)", citra)

# Konversi ke Grayscale
gray = cv2.cvtColor(citra, cv2.COLOR_BGR2GRAY)
cv2.namedWindow("Citra Grayscale", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Citra Grayscale", 500, 500)
cv2.imshow("Citra Grayscale", gray)

print("Representasi matriks (potongan 5x5 pixel):")
print(gray[0:5, 0:5])

# =======================================================
# BAB 3 - Operasi Dasar Citra
# =======================================================

# 1. Thresholding
_, thresh = cv2.threshold(gray, 128, 255, cv2.THRESH_BINARY)
cv2.namedWindow("Thresholding (Biner)", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Thresholding (Biner)", 500, 500)
cv2.imshow("Thresholding (Biner)", thresh)

# 2. Negatif Citra
negatif = 255 - gray
cv2.namedWindow("Negatif Citra", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Negatif Citra", 500, 500)
cv2.imshow("Negatif Citra", negatif)

# 3. Brightness Adjustment
bright = cv2.convertScaleAbs(citra, alpha=1, beta=50)
dark = cv2.convertScaleAbs(citra, alpha=1, beta=-50)
cv2.namedWindow("Brightness (+50)", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Brightness (+50)", 500, 500)
cv2.imshow("Brightness (+50)", bright)
cv2.namedWindow("Brightness (-50)", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Brightness (-50)", 500, 500)
cv2.imshow("Brightness (-50)", dark)

# 4. Flipping
flip_h = cv2.flip(citra, 1)   # horizontal
flip_v = cv2.flip(citra, 0)   # vertical
cv2.namedWindow("Flip Horizontal", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Flip Horizontal", 500, 500)
cv2.imshow("Flip Horizontal", flip_h)
cv2.namedWindow("Flip Vertikal", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Flip Vertikal", 500, 500)
cv2.imshow("Flip Vertikal", flip_v)

# 5. Histogram Equalization
eq = cv2.equalizeHist(gray)
cv2.namedWindow("Histogram Equalization", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Histogram Equalization", 500, 500)
cv2.imshow("Histogram Equalization", eq)

# =======================================================
# Tahan jendela sampai tombol ditekan
# =======================================================
cv2.waitKey(0)
cv2.destroyAllWindows()
