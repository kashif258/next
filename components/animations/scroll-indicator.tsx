"use client";

import { motion } from "framer-motion";
import { ArrowDown } from "lucide-react";

export function ScrollIndicator() {
  return (
    <motion.div
      initial={{ opacity: 0, y: 10 }}
      animate={{ opacity: 1, y: [0, 8, 0] }}
      transition={{ duration: 1.4, repeat: Number.POSITIVE_INFINITY, ease: "easeInOut" }}
      className="mt-10 flex items-center gap-3 text-sm uppercase tracking-[0.35em] text-zinc-300"
    >
      <span>Scroll</span>
      <ArrowDown size={16} />
    </motion.div>
  );
}
