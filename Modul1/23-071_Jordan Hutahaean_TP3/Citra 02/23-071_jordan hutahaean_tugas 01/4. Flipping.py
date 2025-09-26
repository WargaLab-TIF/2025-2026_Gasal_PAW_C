import cv2

# Baca citra
citra = cv2.imread('bojak.jpeg')

# Flipping horizontal (cermin kiri-kanan)
flip_h = cv2.flip(citra, 1)

# Flipping vertikal (cermin atas-bawah)
flip_v = cv2.flip(citra, 0)

# Flipping keduanya (cermin diagonal)
flip_hv = cv2.flip(citra, -1)

# Tampilkan hasil
cv2.imshow('Citra Asli', citra)
cv2.imshow('Flip Horizontal (Kiri-Kanan)', flip_h)
cv2.imshow('Flip Vertikal (Atas-Bawah)', flip_v)
cv2.imshow('Flip Horizontal + Vertikal', flip_hv)

cv2.waitKey(0)
cv2.destroyAllWindows()
